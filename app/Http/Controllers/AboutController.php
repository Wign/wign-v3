<?php

namespace App\Http\Controllers;

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
     * @return \Inertia\Response
     */
    public function show()
    {
        $aboutFile = Jetstream::localizedMarkdownPath('about.md');

        $environment = Environment::createCommonMarkEnvironment();
        $environment->addExtension(new GithubFlavoredMarkdownExtension());

        return Inertia::render('About', [
            'about' => (new CommonMarkConverter([], $environment))->convertToHtml(file_get_contents($aboutFile)),
        ]);
    }
}
