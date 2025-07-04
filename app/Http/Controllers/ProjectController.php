<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjetRequest;
use App\Models\Projet;
use App\Traits\ApiResponseTraits;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    use ApiResponseTraits;

    public function index()
    {
        // $data=Projet::whereDate('date_debut', '>', now())
        //     ->orWhereDate('date_fin', '>', "2025-12-31")
        //     ->orWhere('rate', '>', 0)->orderBy("rate","DESC")
        //     ->get();
            $data=Projet::paginate(3);
        return $this->success("List of projects", $data);

    }

    public function show(Projet $projet)
    {
        // Code to show a specific project
        return new JsonResponse($projet, 200);
    }
        public function store(StoreProjectRequest $request)
    {
        $request->validated($request->all());

        $projet=Projet::create($request->all());
        return $this->success("Project created successfully", $projet);
        // Code to create a new project

    }
    public function update(UpdateProjetRequest $request,Projet $projet)
    {
        $request->validated($request->all());
        $projet=$projet->update($request->all());

        return $this->success("Project updated successfully", $projet);
    }
    public function destroy(Projet $projet)
    {
        $projet->delete();
        // Code to delete a specific project
        return new JsonResponse([
            'message' => 'Project deleted',200]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $projects = Projet::where('nom', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return $this->success("Search results for '{$query}'", $projects);
    }
}
