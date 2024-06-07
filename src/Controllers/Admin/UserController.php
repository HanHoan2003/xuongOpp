<?php
namespace Hp\XuongOop\Controllers\Admin;
// extent controller trong commons
use Hp\XuongOop\Commons\Controller;
use Hp\XuongOop\Commons\Helper;
use Hp\XuongOop\Models\User;
use Rakit\Validation\Validator;

class UserController extends Controller{
    private User $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        
        try {
          
            [$users,$totalPage] = $this->user->paginate($_GET['page'] ?? 1);
            

        // Helper::__debug($totalPage);
        // Helper::__debug($this->user->count());
        } catch (\Throwable $th) {
             Helper::__debug($th->getMessage());
        }


        //===================hien thi ra view=======
        $this->renderViewAdmin('users.index',[
            'users'=>$users,
            'totalPage'=>$totalPage
        ]);
       
    }
    public function create(){
        $this->renderViewAdmin('users.create');
    }
    public function show($id){
        $user = $this->user->findByID($id);
        // echo __CLASS__ .'@'. __FUNCTION__.'id'.$id;
        // Helper::__debug($user);
        $this->renderViewAdmin('users.show',[
            'user'=>$user
        ]);
    }
    public function store(){
        // Helper::__debug($_POST +$_FILES);
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            'email'                 => 'required|email',
            'password'              => 'required|min:6',
            'confirm_password'      => 'required|same:password',
            'avatar'                => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();
        if($validation->fails()){
           $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header('Location:'.url('admin/users/create'));
        }
        else{
            $data = [
                'name'     => $_POST['name'],
                'email'    => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];
        }
        if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0){
            $from = $_FILES['avatar']['tmp_name'];
            $to = 'assets/uploads/' . time() . $_FILES['avatar']['name'];
            
            if (move_uploaded_file($from, PATH_ROOT . $to)) {
                $data['avatar'] = $to;
            } else {
                $_SESSION['errors']['avatar'] = 'Upload Không thành công';

                header('Location:' .url('admin/users/create'));
                exit;
            }
        }
       $_SESSION['status'] = true;
       $_SESSION['msg']="upload thanh cong";
        $this->user->insert($data);
        header('Location:' .url('admin/users'));
        exit;
        }
       
    
    public function edit($id){
       $user = $this->user->findByID($id);
       $this->renderViewAdmin('users.edit',[
        'user'=>$user
       ]);
    }
    public function update($id){
        $user = $this->user->findByID($id);
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            'email'                 => 'required|email',
            'password'              => 'min:6',
            'avatar'                => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();
        if($validation->fails()){
           $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header('Location:'.url("admin/users/{$user['id']}/edit"));
        }
        else{
            $data = [
                'name'     => $_POST['name'],
                'email'    => $_POST['email'],
                'password' => !empty($_POST['password'])
                ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'],
            ];
        }

     $lagUpload = false;
        if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0){
            $lagUpload = true;
            $from = $_FILES['avatar']['tmp_name'];
            $to = 'assets/uploads/' . time() . $_FILES['avatar']['name'];
            
            if (move_uploaded_file($from, PATH_ROOT . $to)) {
                $data['avatar'] = $to;
            } else {
                $_SESSION['errors']['avatar'] = 'Upload Không thành công';

                header('Location:' .url("admin/users/{$user['id']}/edit"));
                exit;
            }
        }
       $_SESSION['status'] = true;
       $_SESSION['msg']="upload thanh cong";
       $this->user->update($id, $data);

       if($lagUpload && $user['avatar'] && file_exists(PATH_ROOT .$user['avatar'])){
         unlink(PATH_ROOT .$user['avatar']);
       }
        header('Location:' .url("admin/users"));
        exit;
    }
    
    public function delete($id){
        $user = $this->user->findByID($id);

        $this->user->delete($id);

        if (
            $user['avatar']
            && file_exists(PATH_ROOT . $user['avatar'])
        ) {
            unlink(PATH_ROOT . $user['avatar']);
        }

        header('Location: ' . url('admin/users'));
        exit();
    }
 }

?> 