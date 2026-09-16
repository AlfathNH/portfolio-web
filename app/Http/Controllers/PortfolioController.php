<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\TimelineEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PortfolioController extends Controller
{
    /**
     * Main portfolio landing page.
     */
    public function index()
    {
        $profile  = config('portfolio');
        $projects = $this->getProjects();
        $skills   = $this->getSkills();
        $timeline = $this->getTimeline();

        return view('portfolio', compact('profile', 'projects', 'skills', 'timeline'));
    }

    /**
     * Get all projects grouped by category.
     */
    private function getProjects(): \Illuminate\Database\Eloquent\Collection
    {
        return Project::ordered()->get();
    }

    /**
     * Get skills grouped by category.
     */
    private function getSkills(): array
    {
        $categories = ['frontend', 'backend', 'database', 'design', 'tools'];
        $skills = [];

        foreach ($categories as $cat) {
            $items = Skill::byCategory($cat)->ordered()->get();
            if ($items->isNotEmpty()) {
                $skills[$cat] = [
                    'label' => ucfirst($cat),
                    'items' => $items,
                ];
            }
        }

        return $skills;
    }

    /**
     * Get timeline entries.
     */
    private function getTimeline(): \Illuminate\Database\Eloquent\Collection
    {
        return TimelineEntry::ordered()->get();
    }
}
