<?php

namespace App\Http\Controllers;

use App\Notifications\RepliedToThread;
use Illuminate\Http\Request;
use App\Project;
use App\Department;
use App\Category;
use Illuminate\Notifications\Notification;
use Image;
use App\User;
use Auth;
use Adldap\Laravel\Facades\Adldap;
use JavaScript;

class ProjectController extends Controller
{

    /**
     *
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Project $project)
    {
        $this->middleware('auth');
        $this->project = $project;
    }

    //APP List
    public function index() {
        $departmentId = 0;

        $user = Auth::user();
        $groups = $user->ldap->getGroups();

        $listproject = Project::all();

        /*$username = Auth::user()->name;
        $search = Adldap::search()->select(['department'])->where('cn', '=', $username)->get();
        $search = json_decode($search, true);
        $search = $search[0]['department'];*/

        $myGroup = '';

        $listdepartment = Department::all();

        foreach ($groups as $group) {
            foreach ($listdepartment as $department) {
                if ($group->getCommonName() == $department->name) {
                    $departmentId = $department->id;
                    $myGroup = $department->name;
                }
            }
        }
        JavaScript::put([
            'departmentId' => $departmentId,
            'allNotify' => $user->unreadNotifications,
            'count' => count($user->unreadNotifications)
        ]);

        return view('project.projects', ['projects' => $listproject, 'user' => $user, 'myGroup' => $myGroup]);
    }

    //Displays the project creation form
    public function create() {
        $id = 0;
        $user = Auth::user();
        $listproject = Project::all();
        JavaScript::put([
            'id' => $id
        ]);
        $listdepartment = Department::all();
        $listcategory = Category::all();

        return view('project.create', ['projects' => $listproject, 'user' => $user, 'listdepartment' => $listdepartment, 'listcategory' => $listcategory]);
    }

    //Save a project
    public function store(Request $request) {
        $user = Auth::user();
        $newProject = new Project();
        $newProject->title = $request->input('title');
        $newProject->link = $request->input('link');
        $newProject->description = $request->input('description');
        $newProject->email = $request->input('category_name');
        if ($request->hasFile('project_image')) {
            $project_image = $request->file('project_image');
            $filename = time() . '.' . $project_image->getClientOriginalExtension();
            Image::make($project_image)->resize(1050, 775)->save( public_path('/uploads/images/' . $filename) );
        } else {
            $filename = 'default-image.png';
        }
        $newProject->image = $filename;

        $newProject->save();

        if ($request->get('selectedDepartment') == null) {
            $newProject->departments()->attach(1);
        } else {
            $listdepartment = $request->get('selectedDepartment');
            foreach ($listdepartment as $department) {
                $newProject->departments()->attach($department);
            }
        }

        session()->flash('success', 'The APP has been well registered !!');

        $getAllUser = User::get();
        foreach ($getAllUser as $getUser) {
            $getUser->notify(new RepliedToThread($newProject));
        }

        return redirect('app');
    }

    public function createCategory(Request $request) {
        $user = Auth::user();
        $newCategory = new Category();
        $newCategory->category = $request->get('category_value');
        $newCategory->save();
    }

    public function edit($id) {
        $user = Auth::user();
        $project = Project::find($id);
        $listdepartment = Department::all();
        $listcategory = Category::all();
        $selectedDepartment = $this->project->find($id)->departments;
        $selectedCategory = Project::find($id)->email;

        JavaScript::put([
            'selectedDepartment' => $selectedDepartment,
            'id' => $id
        ]);

        return view('project.edit', ['project' => $project, 'user' => $user, 'listdepartment' => $listdepartment, 'selectedDepartment' => $selectedDepartment, 'listcategory' => $listcategory, 'selectedCategory' => $selectedCategory]);
    } 

    public function update(Request $request, $id) {
        $user = Auth::user();
        $project = Project::find($id);
        $project->title = $request->input('title');
        $project->link = $request->input('link');
        $project->description = $request->input('description');
        $project->email = $request->input('category_name');
        if ($request->hasFile('project_image')) {
            $project_image = $request->file('project_image');
            $filename = time() . '.' . $project_image->getClientOriginalExtension();
            Image::make($project_image)->resize(1050, 775)->save( public_path('/uploads/images/' . $filename) );
            $project->image = $filename;
        }

        if ($request->get('selectedDepartment') == null) {
            $project->departments()->detach();
            $project->departments()->attach(1);
        } else {
            $listdepartment = $request->get('selectedDepartment');
            $project->departments()->detach();
            foreach ($listdepartment as $department) {
                $project->departments()->attach($department);
            }
        }

        $project -> save();

        session()->flash('success', 'The APP has been modified !!');

        return redirect('app');
    } 

    public function destroy(Request $request) {
        $user = Auth::user();
        Project::find($request->id)->delete();
        return redirect('project');
    }

    public function pagenotfound() {
        return view('errors.503');
    }

}
