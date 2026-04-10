<?php

declare(strict_types=1);

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AccountController;
use App\Controllers\AdminClassController;
use App\Controllers\AdminTrainerController;
use App\Controllers\AdminUserController;
use App\Controllers\ApiController;
use App\Controllers\AuthController;
use App\Controllers\ClassController;
use App\Controllers\HomeController;
use App\Controllers\TrainerController;
use App\Database\Database;
use App\Repositories\ClassRepository;
use App\Repositories\ReservationRepository;
use App\Repositories\TrainerRepository;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use App\Services\ClassService;
use App\Services\ReservationService;
use App\Services\TrainerService;
use App\Services\UserService;
use App\Support\Router;

$pdo = Database::create(require __DIR__ . '/../src/Config/database.php');

$userRepository = new UserRepository($pdo);
$classRepository = new ClassRepository($pdo);
$trainerRepository = new TrainerRepository($pdo);
$reservationRepository = new ReservationRepository($pdo);

$authService = new AuthService($userRepository);
$classService = new ClassService($classRepository, $trainerRepository);
$trainerService = new TrainerService($trainerRepository);
$reservationService = new ReservationService($reservationRepository, $classRepository);
$userService = new UserService($userRepository, $reservationRepository);

$homeController = new HomeController($classService, $trainerService);
$authController = new AuthController($authService);
$classController = new ClassController($classService);
$trainerController = new TrainerController($trainerService);
$accountController = new AccountController($userService, $reservationService);
$adminClassController = new AdminClassController($classService);
$adminTrainerController = new AdminTrainerController($trainerService);
$adminUserController = new AdminUserController($userService);
$apiController = new ApiController($classService, $reservationService);

$router = new Router();
$router->get('/', [$homeController, 'index']);
$router->get('/login', [$authController, 'loginForm']);
$router->post('/login', [$authController, 'login']);
$router->get('/register', [$authController, 'registerForm']);
$router->post('/register', [$authController, 'register']);
$router->post('/logout', [$authController, 'logout']);
$router->get('/classes', [$classController, 'index']);
$router->get('/classes/{id}', [$classController, 'details']);
$router->get('/trainers', [$trainerController, 'index']);
$router->get('/trainers/{id}', [$trainerController, 'details']);
$router->get('/dashboard', [$accountController, 'dashboard']);
$router->get('/account/settings', [$accountController, 'settings']);
$router->post('/account/settings', [$accountController, 'updateSettings']);
$router->post('/account/delete', [$accountController, 'softDelete']);
$router->get('/admin/classes', [$adminClassController, 'index']);
$router->get('/admin/trainers', [$adminTrainerController, 'index']);
$router->get('/admin/users', [$adminUserController, 'index']);
$router->get('/api/classes', [$apiController, 'getClasses']);
$router->post('/api/reservations', [$apiController, 'createReservation']);
$router->delete('/api/reservations/{id}', [$apiController, 'deleteReservation']);
$router->dispatch($_SERVER['REQUEST_METHOD'] ?? 'GET', $_SERVER['REQUEST_URI'] ?? '/');
