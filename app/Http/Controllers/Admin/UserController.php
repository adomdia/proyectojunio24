<?php



use App\Http\Controllers\Admin\BaseFiltradoController;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class UserController extends BaseFiltradoController
{

    protected function miFiltro(Builder $query)
    {
        $role_id = \auth()->user()->role_id;

        if ($role_id == 1) {
            return $query;
        } else if ($role_id == 3) {
            return $query->whereNotIn('role_id', [1]);
        }



        return $query->whereNotIn('role_id', [1]);
    }


    public function update(Request $request, $id)
    {

        if($request->password!=null){
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'password'=>'sometimes|min:6|max:20',
                'role_id'=>'required',
                'email' => 'required|string|email|max:255',
                'avatar'=>'mimes:jpg,bmp,png',


            ]);
        }else{
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'avatar'=>'mimes:jpg,bmp,png',
                'role_id'=>'required'
            ]);
        }

        if (Auth::user()->role_id != 1) //no es admin
        {
            if ($request->role_id == 1) {

                return redirect()->back()->with([
                    'message' => 'Acción no permitida',
                    'alert-type' => 'error',
                ]);
            }else{
                    $user=User::find($id);
                    if($user){
                        $user->name=$request->name;
                        $user->email=$request->email;
                        $user->role_id=$request->role_id;
                        if($request->password!=null){
                            $user->password= Hash::make($request->password);
                        }
                        $user->save();
                        return redirect()->back()->with([
                            'message' => 'Datos actualizados correctamente',
                            'alert-type' => 'success',
                        ]);
                    }
            }
        }else{
            $user=User::find($id);
            if($user){
                $user->name=$request->name;
                $user->email=$request->email;
                $user->role_id=$request->role_id;
                if($request->password!=null){
                    $user->password= Hash::make($request->password);
                }
                $user->save();
                return redirect()->back()->with([
                    'message' => 'Datos actualizados correctamente',
                    'alert-type' => 'success',
                ]);
            }
        }

      $this->onlyAdminCanSetAdmin($request);

        return redirect()->back()->with([
            'message' => 'Acción no permitida',
            'alert-type' => 'error',
        ]);
       // $return = parent::update($request, $id);
        // $return->setTargetUrl(URL::previous());
        //return $return;
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password'=>'required|min:6|max:20',
            'role_id'=>'required'

        ]);

        if (Auth::user()->role_id != 1) //no es admin
        {
            if ($request->role_id == 1) {

                return redirect()->back()->with([
                    'message' => 'Acción no permitida',
                    'alert-type' => 'error',
                ]);
               // dd('3');
                //$this->detectadaAccionProhibida();
            }else{
                return parent::store($request);
            }
        }else{
            return parent::store($request);
        }
       // $this->onlyAdminCanSetAdmin($request);

    }

    public function suplantar($id)
    {
        $this->permissionCheck();

        $target = $this->getTargetUser($id);

        $real_id = Auth::id();
        Auth::logout();
        Auth::loginUsingId($id);
        session()->put('real_id', $real_id);

        return redirect()->route('voyager.dashboard');
    }

    private function permissionCheck()
    {
        if (Auth::user()->role_id != 1){
            $this->detectadaAccionProhibida();
        }
    }

    /**
     * @param $id
     * @return User|User[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    private function getTargetUser($id)
    {
        $target = User::findOrFail($id);

        if ($target->role_id == 1){
            $this->detectadaAccionProhibida();
        }


        return $target;
    }

    private function onlyAdminCanSetAdmin(Request $request)
    {

        if (Auth::user()->role_id != 1) //no es admin
        {
            if ($request->get('role_id') === 1){
                $this->detectadaAccionProhibida();
            }


            $array = $request->get('user_belongstomany_role_relationship');
            if (!empty($array))
                foreach ($array as $role) {
                    if ($role == 1){

                        $this->detectadaAccionProhibida();
                    }
                }

        }
    }

    private function detectadaAccionProhibida()
    {
       die('Detectada acción prohibida');

    }
}
