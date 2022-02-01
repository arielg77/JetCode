<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

class Search extends Component
{

    public $query;
    public $courses;
    public $highlightIndex;

    public function mount() {
        $this->clear();
    }

    public function clear() {
        $this->query = '';
        $this->courses = [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight() {
        if($this->highlightIndex === count($this->courses) - 1) {
            $this->highlightIndex = 0;

            return;
        }

        $this->highlightIndex++;
    }

    public function decrementHighlight() {
        if($this->highlightIndex === -1) {
            return;
        }

        if($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->courses) - 1;

            return;
        }

        $this->highlightIndex--;
    }

    public function selectCourse() {
        $course = $this->courses[$this->highlightIndex] ?? null;
        if($course) {
            $this->redirect(route('courses.show', $course['slug']));
        }
    }

    public function updatedQuery() {
        $this->courses = Course::where('title', 'LIKE', '%' . $this->query . '%')->where('status', 3)->take(8)->get()->toArray();
    }

    public function render()
    {
        return view('livewire.search');
    }


}
