<?php

// add_theme_support('post-thumbnails');

  function custom_theme_setup(){
    // head内にフィードリンクを出力
    add_theme_support('authomatic-feed-links');

    // タイトルタグを動的に出力
    add_theme_support('title-tag');

    // ブロックエディター用のCSSを有効化
    add_theme_support('wp-block-styles');

    //埋め込みコンテンツをレスポンシブ対応に
    add_theme_support('responsive-embeds');

  }
  add_action('after_setup_theme', 'custom_theme_setup');


  function myportfolio_scripts(){
    //font
    wp_enqueue_style(
      'pacifico-font',
      'https://fonts.googleapis.com/css2?family=Pacifico&display=swap',
      array(),
      '1.0',
    );

    //css
    wp_enqueue_style(
        'reset-style',
        esc_url(get_theme_file_uri('css/reset.css')),
        array(),
        '1.0',
        'all'
    );

    wp_enqueue_style(
      'slick-style',
      esc_url(get_theme_file_uri('css/slick.css')),
      array('reset-style'),
      '1.0',
      'all'
    );

    wp_enqueue_style(
      'base-style',
      get_stylesheet_uri(),
      array('slick-style'),
      '1.0',
      'all'
    );

    //js

    wp_deregister_script('jquery');

    wp_enqueue_script(
      'gsap',          //ハンドル名
      'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js',  //ファイルパス
      array(),               //依存関係
      '3.9.1',                 //バージョン指定
      false                  //メディアタイプ
    );

    wp_enqueue_script(
      'scroll-trigger',          //ハンドル名
      'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js',  //ファイルパス
      array('gsap'),               //依存関係
      '3.9.1',                 //バージョン指定
      false                  //メディアタイプ
    );

    wp_enqueue_script(
      'jquery-3.6.0',          //ハンドル名
      esc_url(get_theme_file_uri('js/jquery-3.6.0.min.js')),  //ファイルパス
      array('scroll-trigger'),               //依存関係
      '3.6.0',                 //バージョン指定
      false                  //メディアタイプ
    );

    wp_enqueue_script(
      'js-vivus',          //ハンドル名
      esc_url(get_theme_file_uri('js/vivus_copy.js')), 
      array('jquery-3.6.0'),
      '1.0',
      false
    );

    wp_enqueue_script(
      'slick-min',          //ハンドル名
      esc_url(get_theme_file_uri('js/slick.min.js')),  //ファイルパス
      array('js-vivus'),               //依存関係
      // array('jquery'),
      '1.0',                 //バージョン指定
      false                  //メディアタイプ
    );

    wp_enqueue_script(
      'main-script',          //ハンドル名 未
      esc_url(get_theme_file_uri('js/main.js')),
      array('slick-min'),
      '1.0',
      false,
      true 
    );

  }
  add_action('wp_enqueue_scripts', 'myportfolio_scripts');

?>