<?php
require_once "../vendor/autoload.php";
require_once "../src/DatabaseController.php";
require_once "../src/ProjectController.php";

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    //'cache' => 'cache',
]);

$projectController = new ProjectController();
$projects = $projectController->getProjects();

$projectsWithTechnologies = [];

foreach ($projects as $project) {
    $technologies = $projectController->getTechnologiesByProject($project->id);
    $projectsWithTechnologies[] = [
        'id' => $project->id,
        'name' => $project->name,
        'description' => $project->description,
        'technologies' => $technologies
    ];
}

echo $twig->render('index.html', [
    'titulo' => 'Proyectos',
    'projects' => $projectsWithTechnologies,
]);
?>

