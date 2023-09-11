<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function Teacher()
    {
        $this->authorize('viewTeacher', User::class);
        $teachers = User::where('role_id', 2)->get();
        return view('dashboard.teachers.showAllTeachers',compact('teachers'));
    }

    public function addTeacher(Request $request)
    {
        $this->authorize('addTeacher', User::class);
        $photo = '';
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $photo = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/Uploads/Teacher'), $photo);
        }
        $User=User::create(
            [
                'SSN'=>$request->SSN,
                'Fname'=>$request->Fname,
                'Lname'=>$request->Lname,
                'email'=>$request->email,
                'password'=>$request->password,
                'photo'=>$photo,
                'role_id'=>2,
            ]
        );
        foreach ($request->courses as $course) {
            Course::create(
                [
                    'name'=>$course,
                    'user_id'=>$User->id,
                ]
            );
        }
        return redirect('/Teacher');
    }

    public function destroyTeacher(Request $request)
    {
        $id = User::findOrFail($request->id);

        if ($id->photo) {
            $oldPhotoPath = public_path('assets/Uploads/Teacher/') . $id->photo;

            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath);
            }
        }

        $id->delete();

        return redirect('/Teacher');
    }

    public function updateTeacher(Request $request)
    {
        $id = User::where('id', $request->id)->first();
        $photo = '';

        if ($request->hasFile('photo')) {
            if ($id->photo) {
                $oldPhotoPath = public_path('assets/Uploads/Teacher/') . $id->photo;

                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            $file = $request->file('photo');
            $photo = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/Uploads/Teacher'), $photo);
        }

        $id->update([
            'SSN' => $request->SSN,
            'Fname' => $request->Fname,
            'Lname' => $request->Lname,
            'email' => $request->email,
            'password' => $request->password,
            'photo' => $photo ?: $id->photo,
        ]);

        $userCourses = $request->courses;
        $existingCourses = Course::where('user_id', $id->id)->pluck('name')->toArray();

        foreach ($userCourses as $userCourse) {
            if (in_array($userCourse, $existingCourses)) {
                Course::where('user_id', $id->id)->where('name', $userCourse)->update(['name' => $userCourse]);
            } else {
                Course::create([
                    'user_id' => $id->id,
                    'name' => $userCourse,
                ]);
            }
        }

        return redirect('/Teacher');
    }



    public function Student()
    {
        $this->authorize('viewStudent', User::class);
        $students = User::where('role_id', 3)->get();
        return view('dashboard.students.showAllStudents',compact('students'));
    }

    public function addStudent(Request $request)
    {
        $this->authorize('addStudent', User::class);
        $photo = '';
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $photo = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/Uploads/Student'), $photo);
        }
        $User=User::create(
            [
                'SSN'=>$request->SSN,
                'Fname'=>$request->Fname,
                'Lname'=>$request->Lname,
                'email'=>$request->email,
                'password'=>$request->password,
                'photo'=>$photo,
                'role_id'=>3,
            ]
        );
        return redirect('/Student');

    }

    public function updateStudent(Request $request)
    {
        $id = User::where('id', $request->id)->first();
        $photo = '';

        if ($request->hasFile('photo')) {
            if ($id->photo) {
                $oldPhotoPath = public_path('assets/Uploads/Student/') . $id->photo;

                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            $file = $request->file('photo');
            $photo = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/Uploads/Student'), $photo);
        }

        $id->update([
            'SSN' => $request->SSN,
            'Fname' => $request->Fname,
            'Lname' => $request->Lname,
            'email' => $request->email,
            'password' => $request->password,
            'photo' => $photo ?: $id->photo,
        ]);


        return redirect('/Student');
    }

    public function destroyStudent(Request $request)
    {
        $id = User::findOrFail($request->id);

        if ($id->photo) {
            $oldPhotoPath = public_path('assets/Uploads/Student/') . $id->photo;

            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath);
            }
        }

        $id->delete();

        return redirect('/Student');
    }


    public function Profile()
    {
        $profile = User::where('id', Auth::user()->id)->first();
        $roleFolder = $this->getRoleFolder($profile->role_id);

        return view('dashboard.profiles.showUserProfile', compact('profile', 'roleFolder'));
    }

    function getRoleFolder($roleId)
    {
        if ($roleId == 1) {
            return 'Admin';
        } elseif ($roleId == 2) {
            return 'Teacher';
        } elseif ($roleId == 3) {
            return 'Student';
        }
    }


    public function updateProfile(Request $request)
    {
        $id = User::where('id', $request->id)->first();
        $photo = '';

        if ($request->hasFile('photo')) {
            if ($id->photo) {
                $oldPhotoPath = public_path('assets/Uploads/Student/') . $id->photo;

                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            $file = $request->file('photo');
            $photo = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/Uploads/Student'), $photo);
        }

        $id->update([
            'SSN' => $request->SSN,
            'Fname' => $request->Fname,
            'Lname' => $request->Lname,
            'email' => $request->email,
            'password' => $request->password,
            'photo' => $photo ?: $id->photo,
        ]);

        return redirect('/Profile');
    }



}
