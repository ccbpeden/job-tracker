<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Job.php";

    session_start();

    if(empty($_SESSION['list_of_jobs'])) {
        $_SESSION['list_of_places'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('create_job.html.twig', array('jobs' => Job::getAll()));
    });

    $app->post("/jobs", function() use ($app) {
        $job = new Job($_POST['jobName'], $_POST['employer'], $_POST['timeEmployed']);
        $job->save();
        return $app['twig']->render('list_jobs.html.twig', array('newjob' => $job));
    });

    $app->post("/delete_jobs", function() use ($app) {
    Job::deleteAll();
    return $app['twig']->render('delete_jobs.html.twig');
});

?>
