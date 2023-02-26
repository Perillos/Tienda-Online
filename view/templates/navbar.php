<?php

require_once "../config/dbconnect.php";

function navbar($user)
{
  if (empty($user)) {
    navbarInvited();
  }
  if ($user == "client") {
    navbarClient($user);
  }
  if ($user == "editor") {
    navbarInvited();
  }
  if ($user == "admin") {
    navbarInvited();
  }

  $html = "

  ";

  echo $html;
}


function navbarInvited()
{
  $html = "
    <nav class='bg-white'>
      <div class='mx-auto max-w-7xl px-2 sm:px-6 lg:px-8'>
        <div class='relative flex h-16 items-center justify-between'>
          <div
            class='flex flex-1 items-center justify-center sm:items-stretch sm:justify-start'
          >
            <div class='flex flex-shrink-0 items-center'>
              <a href='home.php'>
                <img
                  class='h-16 w-auto lg:block'
                  src='./build/brand/converse.svg'
                  alt='converse'
                />
              </a>
            </div>
          </div>
          <div
            class='absolute inset-y-0 right-0 flex gap-1 items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0'
          >
            <button
              type='button'
              class='flex-auto rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 h-8 w-20 rounded-full text-white'
              id='user-menu-button'
            >
              Sing-In
            </button>
            <button
              type='button'
              class='flex-auto rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 h-8 w-20 rounded-full text-white'
              id='user-menu-button'
            >
              Sing-Up
            </button>
            <button type='button' id='user-menu-button'>
              <img
                class='items-center h-8 w-auto lg:block ring-white text-white'
                src='/build/brand/cart.svg'
                alt='converse'
              />
            </button>
          </div>
        </div>
      </div>
    </nav>

  ";

  echo $html;
}


function navbarClient($user)
{
  $html = "
    <nav class='bg-white'>
      <div class='mx-auto max-w-7xl px-2 sm:px-6 lg:px-8'>
        <div class='relative flex h-16 items-center justify-between'>
          <div
            class='flex flex-1 items-center justify-center sm:items-stretch sm:justify-start'
          >
            <div class='flex flex-shrink-0 items-center'>
              <img
                class='h-16 w-auto lg:block'
                src='/build/brand/converse.svg'
                alt='converse'
              />
            </div>
          </div>
          <div
            class='absolute inset-y-0 right-0 flex gap-1 items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0'
          >
            <button
              type='button'
              class='flex-auto rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 h-8 w-20 rounded-full text-white'
              id='user-menu-button'
            >
              Sing-Out
            </button>
            <button type='button' id='user-menu-button'>
              <img
                class='items-center h-8 w-auto lg:block ring-white text-white'
                src='/build/brand/cart.svg'
                alt='converse'
              />
            </button>
          </div>
        </div>
      </div>
    </nav>

  ";

  echo $html;
}

function navbarEditor()
{
  $html = "
    <nav class='bg-white'>
      <div class='mx-auto max-w-7xl px-2 sm:px-6 lg:px-8'>
        <div class='relative flex h-16 items-center justify-between'>
          <div
            class='flex flex-1 items-center justify-center sm:items-stretch sm:justify-start'
          >
            <div class='flex flex-shrink-0 items-center'>
              <img
                class='h-16 w-auto lg:block'
                src='/build/brand/converse.svg'
                alt='converse'
              />
            </div>
          </div>
          <div
            class='absolute inset-y-0 right-0 flex gap-1 items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0'
          >
            <button
              type='button'
              class='flex-auto rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 h-8 w-20 rounded-full text-white'
              id='user-menu-button'
            >
              Sing-Out
            </button>
            <button type='button' id='user-menu-button'>
              <img
                class='items-center h-8 w-auto lg:block ring-white text-white'
                src='/build/brand/cart.svg'
                alt='converse'
              />
            </button>
          </div>
        </div>
      </div>
    </nav>

  ";

  echo $html;
}

function navbarAdmin()
{
  $html = "
    <nav class='bg-white'>
      <div class='mx-auto max-w-7xl px-2 sm:px-6 lg:px-8'>
        <div class='relative flex h-16 items-center justify-between'>
          <div
            class='flex flex-1 items-center justify-center sm:items-stretch sm:justify-start'
          >
            <div class='flex flex-shrink-0 items-center'>
              <img
                class='h-16 w-auto lg:block'
                src='/build/brand/converse.svg'
                alt='converse'
              />
            </div>
          </div>
          <div
            class='absolute inset-y-0 right-0 flex gap-1 items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0'
          >
            <button
              type='button'
              class='flex-auto rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 h-8 w-20 rounded-full text-white'
              id='user-menu-button'
            >
              Sing-Out
            </button>
            <button type='button' id='user-menu-button'>
              <img
                class='items-center h-8 w-auto lg:block ring-white text-white'
                src='/build/brand/cart.svg'
                alt='converse'
              />
            </button>
          </div>
        </div>
      </div>
    </nav>

  ";

  echo $html;
}

// Refactorizar el codigo anterior