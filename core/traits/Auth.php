<?php
namespace Core;

trait AuthTrait
{
  public function authenticate($username, $password)
  {
    // Implement authentication logic here
  }

  public function isLoggedIn()
  {
    // Check if user is logged in and return true or false
  }

  public function requireLogin(Request $request, Response $response)
  {
    // Redirect to login page if user is not logged in
  }
}