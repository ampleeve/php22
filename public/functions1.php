<?php
/**
 * Функция возвращает всех пользователей на сайте.
 * @return array
 */
function getUsers()
{
  return [
    [
      'id' => 1,
      'login' => 'admin',
      'password' => md5('123')
    ],
    [
      'id' => 2,
      'login' => 'user',
      'password' => md5('555')
    ]
  ];
}

/**
 * Функция вернет true если пользователь авторизован.
 * @return bool
 */
function isAuthorized()
{
  return !empty($_SESSION['id']);
}

/**
 * Функция редиректит (перенаправляет) пользователя на другую страницу.
 * @param $to
 */
function redirect($to)
{
  header('Location: ' . $to);
  exit();
}

/**
 * Функция нужна для авторизации пользователя.
 * @param string $login Логин пользователя
 * @param string $password Пароль пользователя
 * @return bool Возвращается true при успешной авторизации, иначе false.
 */
function login($login, $password)
{
  $currentUser = false;
  foreach (getUsers() as $user) {
    if ($user['login'] == $login) {
      $currentUser = $user;
      break;
    }
  }

  if ($currentUser && $currentUser['password'] == md5($password)) {
    $_SESSION['id'] = $currentUser['id'];
    return true;
  }

  return false;
}

/**
 *  возвращает имя пользователя.
 * @return string
 */
function getCurrentUserName()
{
  if (!empty($_SESSION['id'])) {
    foreach (getUsers() as $user) {
      if ($_SESSION['id'] == $user['id']) {
        return $user['login'];
      }
    }
  }

  return 'Гость';
}

/**
 * Функция "разлогинивает" пользователя.
 */
function logout()
{
  unset($_SESSION['id']);
}