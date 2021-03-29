<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Show the Contact Us page.
     *
     * @return \Inertia\Response
     */
    public function show()
    {
        return Inertia::render('Wign/Contact');
    }
}
