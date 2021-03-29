<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Jetstream\Jetstream;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;

class AboutController extends Controller
{
    /**
     * Show the About Us page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function show(Request $request)
    {
        $aboutFile = Jetstream::localizedMarkdownPath('about.md');

        $environment = Environment::createCommonMarkEnvironment();
        $environment->addExtension(new GithubFlavoredMarkdownExtension());

        return Inertia::render('Wign/About', [
            'about' => (new CommonMarkConverter([], $environment))->convertToHtml(file_get_contents($aboutFile)),
        ]);
    }
}
