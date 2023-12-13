<div>
    <h1 style="text-align: center">{{$titulo}}</h1>
    <p style="text-align: center">{{$descripcion}}</p>
    <div class="col-3" style="text-align: center;margin:auto;margin-top: 50px">

        <button wire:click="increment()" class="btn btn-primary">+</button>
        <button wire:click="decrement()" class="btn btn-success">-</button>
        <p style="font-size: 60px;font-weight: bold">{{$count}}</p>
        <p style="color: red;font-weight: bold">{{$alert}}</p>
    </div>


</div>
