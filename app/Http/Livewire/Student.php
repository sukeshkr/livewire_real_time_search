<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Student as ModelsStudent;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Student extends Component
{
    public $search = '';
    public $perPage=10;
    use WithPagination;
    use WithFileUploads;

    public $name,$email,$course,$student_id,$images=[];
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'course' => 'required|string',
        'images.*'=>'required|image|max:1024',
    ];


    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveStudent()
    {
        $validated = $this->validate();

        $student = ModelsStudent::create($validated);

        foreach ($this->images as $photo) {

            Image::create([
                'student_id' => $student->id,
                'image_name' => $photo->getFilename(),
            ]);

            $photo->storeAS('images',$photo->getFilename());
        }

        session()->flash('message','Created sucessfully');

        $this->resetInput();

       $this->dispatchBrowserEvent('close-model');

    }

    public function closeModal()
    {
        $this->resetInput();

    }
    public function editStudent(int $studentId)
    {
        $student = ModelsStudent::find($studentId);

        if($student) {

            $this->student_id = $student->id;
            $this->name = $student->name;
            $this->email = $student->email;
            $this->course = $student->course;

        }
        else {
            return redirect()->route('student');
        }
    }
    public function updateStudent()
    {
        $validated = $this->validate();
        ModelsStudent::where('id',$this->student_id)->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'course' => $validated['course'],
        ]);

        session()->flash('message','Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-model');
    }
    public function resetInput()
    {
        $this->name='';
        $this->email='';
        $this->course='';

    }
    public function deleteStudent(int $studentId)
    {
        $this->student_id = $studentId;

    }
    public function destroyStudent()
    {
        $student = ModelsStudent::find($this->student_id);

        if($student) {

            $student->delete();

            session()->flash('message','Deleted Successfully');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-model');

        }
        else {
            return redirect()->route('student');
        }
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {

        $students = ModelsStudent::where('name', 'like', '%'.$this->search.'%')->latest()->paginate($this->perPage);

        return view('livewire.student',[

            'students' => $students
        ]);
    }
}
