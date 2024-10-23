<?php

use Spatie\Permission\Models\Role;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

// Dashboard > Profile
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Profile', route('profiles.index'));
});

Breadcrumbs::for('letters', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Letter');
});

// Dashboard > Profile > Edit
Breadcrumbs::for('edit profile', function (BreadcrumbTrail $trail) {
    $trail->parent('profile');
    $trail->push('Edit');
});

// Dashboard > User
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User');
});

// Dashboard > User > Edit
Breadcrumbs::for('edit user', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('Edit');
});

// Dashboard > User > Add
Breadcrumbs::for('create user', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('Add', route('users.create'));
});

// Dashboard > User > Show
Breadcrumbs::for('show user', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('Show');
});

// Dashboard > Role
Breadcrumbs::for('roles', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Role', route('roles.index'));
});

// Dashboard > Role > Edit
Breadcrumbs::for('edit role', function (BreadcrumbTrail $trail) {
    $trail->parent('roles');
    $trail->push('Edit');
});

// Dashboard > Role > Add
Breadcrumbs::for('create role', function (BreadcrumbTrail $trail) {
    $trail->parent('roles');
    $trail->push('Add', route('roles.create'));
});

// Dashboard > Role > Show
Breadcrumbs::for('show role', function (BreadcrumbTrail $trail) {
    $trail->parent('roles');
    $trail->push('Show');
});
