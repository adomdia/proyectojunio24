@extends('layouts.app')
@section('last_head')
    {{--Aquí estilos solo para esta página--}}
@endsection
@section('content')
<style>
    .message-container {
        max-width: 75%;
        margin-bottom: 10px;
        border-radius: 10px;
        padding: 10px;
        clear: both;
        overflow: hidden;
        position: relative;
    }

    .message-right {
        background-color: #544ab0;
        color: white;
        float: right;
    }

    .message-left {
        background-color: #f1f1f1;
        float: left;
    }

    .message-text-container {
        margin-bottom: 8px; /* Ajusta este valor según sea necesario */
    }

    .message-text {
        margin: 0;
    }

    .message-time {
        position: absolute;
        bottom: 0;
        left: 0;
        font-size: 12px;
        color: #888;
    }

    #message-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-sizing: border-box;
    }

    #send-message-form {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #send-message-form button {
        background-color: #544ab0;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 10px;
        cursor: pointer;
    }
    
    .chat{
        margin-top: 150px;
    }



    .user-list {
        width: 100%;
        float: left;
        padding: 10px;
        height: fit-content;
        overflow-y: auto;
        border-right: 1px solid #ccc;
    }

    .user-list-item {
        margin-bottom: 10px;
    }
</style>

<div class="chat container">
    <div class="row justify-content-center">
        <div class="col-md-3 col-12"> <!-- Modificado para hacer uso de las clases de Bootstrap para el diseño responsivo -->
            <div class="user-list">
                <!-- Lista de usuarios con los que tienes chats abiertos -->
                @foreach($chatUsers as $user)
                    <a href="{{route('chat', $user->id)}}" target="_self" style="text-decoration: none">
                    <div class="user-list-item d-flex">
                        <div style="width: 30px; height: 30px; overflow: hidden; border-radius: 50%;">
                            <img src="{{ Voyager::image($user->avatar) }}"
                                 onerror="this.onerror=null;this.src='{{ asset('storage/users/default.png') }}';"
                                 class=""
                                 style="height: 100%; width: 100%; object-fit: cover;"
                                 alt="{{ $user->nick ?? $user->name }}"/>
                        </div>
                        <strong class="text-dark ml-3">{{ $user->name }}</strong>
                    </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-9 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div style="width: 30px; height: 30px; overflow: hidden; border-radius: 50%;">
                            <img src="{{ Voyager::image($user->avatar) }}"
                                 onerror="this.onerror=null;this.src='{{ asset('storage/users/default.png') }}';"
                                 class=""
                                 style="height: 100%; width: 100%; object-fit: cover;"
                                 alt="{{ $user->nick ?? $user->name }}"/>
                        </div>
                        <a href="{{route('guest_profile', $user->id)}}" style="text-decoration: none;"><h5 class="mb-0 ml-3" style="color:#544ab0"><strong>{{ $receiver->name }}</strong></h5></a>
                    </div>
                </div>

                <div class="card-body chat-container" id="chat-container" style="height: 60vh; overflow-y: auto;">
                    <div id="chat-messages">
                        @if(isset($messages))
                            @foreach($messages as $message)
                                <div class="message-container @if($message->user_id === strval(auth()->id())) message-right @else message-left @endif" data-message-id="{{$message->id}}">
                                    <strong class="message-text">{!! $message->text !!}</strong>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="card-footer">
                    <form id="send-message-form">
                        @csrf
                        <input hidden name="foreign_id" value="{{ $receiver->id }}">
                        <input type="text" id="message-input" name="content" placeholder="Escribe un mensaje">
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
@section('javascript')
<script>
    $(document).ready(function () {
        function scrollToBottom() {
            var chatContainer = $('#chat-container');
            chatContainer.scrollTop(chatContainer[0].scrollHeight);
        }

        scrollToBottom();

        function loadMessages() {
            var lastMessageId = $('#chat-messages div:last').data('message-id') || 0;

            $.ajax({
                type: 'GET',
                url: '{{ url("/chat/$receiver->id/messages") }}',
                data: { lastMessageId: lastMessageId },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response);
                    var messages = response.messages;

                    if (messages.length > 0) {
                        for (var i = 0; i < messages.length; i++) {
                            var isCurrentUser = messages[i].user_id === {{ auth()->id() }};
                            
                            var messageClass = isCurrentUser ? 'message-right' : 'message-left';
                            
                            
                            var messageContent = '<div class=" message-container ' + messageClass + '" data-message-id="' + messages[i].id + '"><strong>' + messages[i].text + '</strong></div>';
                            
                            $('#chat-messages').append(messageContent);
                        }

                        scrollToBottom();
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

       
        loadMessages();

       
        setInterval(function () {
            loadMessages();
        }, 1000);

        $('#send-message-form').submit(function (e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '{{ url("/chat/$receiver->id/sends/") }}',
                data: formData,
                success: function (response) {
                    console.log(response);
                    $('#message-input').val('');

                    var messageContent = '<div class="message-right message-container" data-message-id="'+ response.message.id + '"><strong>' + response.message.text + '</strong></div>';
                    $('#chat-messages').append(messageContent);

                    $('#chat-container').scrollTop($('#chat-container')[0].scrollHeight);

                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection
