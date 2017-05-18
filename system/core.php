<?php
/**
 * Created by PhpStorm.
 * User: Peker
 * Date: 11.04.2017
 * Time: 22:51
 */

namespace System;

trait Core {

    public $assets;

    public function __construct()
    {

        $this->assets = new \Libs\Assets\Assets();

        $this->assets->createAssetsGroup("home")
            ->createAsset("roboto", "font", "https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en", "roboto")
            ->createAsset("materialIcons", "css", "https://fonts.googleapis.com/icon?family=Material+Icons", "materialIcons")
            ->createAsset("materialColorPalette", "css", "https://code.getmdl.io/1.3.0/material.grey-orange.min.css", "materialColorPalette")
            ->createAsset('jquery', 'js', 'https://code.jquery.com/jquery.min.js', 'jquery')
            ->createAsset('homeJS', 'js', SCRIPT_DIR . '/home.js', 'homeJS')
            ->createAsset('homeCSS', 'css', STYLE_DIR . '/home.css', 'homeCSS')
            ->createAsset("materialJS", "js", "https://code.getmdl.io/1.3.0/material.min.js", "materialJS");



    }

}
