<div id="top"></div>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->

<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
<!-- [![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url] -->

<!-- PROJECT LOGO -->
<!-- <br />
<div align="center">
  <a href="https://github.com/github_username/repo_name">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

<h3 align="center">project_title</h3>

  <p align="center">
    project_description
    <br />
    <a href="https://github.com/github_username/repo_name"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/github_username/repo_name">View Demo</a>
    ·
    <a href="https://github.com/github_username/repo_name/issues">Report Bug</a>
    ·
    <a href="https://github.com/github_username/repo_name/issues">Request Feature</a>
  </p>
</div> -->

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->

## About The Project

This is an example of Corsivalab Theme

### Built With

- [Bootstrap](https://getbootstrap.com)
- [JQuery](https://jquery.com)

### Install SCSS

1. Download sass package

```sh
npm install -g sass
```

2. Go to folder scss

```sh
cd C:/xampp/htdocs/website/corsivalab-exam/wp-content/themes/demo/assets/scss
```

3.

```sh
sass --watch --no-source-map main.scss ../css/main.css
```

<p align="right">(<a href="#top">back to top</a>)</p>

### Used Plugins

- [Additional Variation Images Gallery for WooCommerce](https://wordpress.org/plugins/woo-variation-gallery/)
- [FiboSearch – Ajax Search for WooCommerce](https://wordpress.org/plugins/ajax-search-for-woocommerce/)
- [All-in-One WP Migration](https://wordpress.org/plugins/all-in-one-wp-migration/)
- [All-in-One WP Migration Unlimited Extension](https://hnamcoder.com/themes-va-plugins/all-in-one-wp-migration-unlimited-extension/)
- [Contact Form 7](https://wordpress.org/plugins/contact-form-7)
- [Yoast Duplicate Post](https://wordpress.org/plugins/duplicate-post)
- [Easy Auto SKU Generator for WooCommerce](https://wordpress.org/plugins/easy-woocommerce-auto-sku-generator)
- [Smash Balloon Social Photo Feed](https://wordpress.org/plugins/instagram-feed)
- [Load More Products for WooCommerce](https://wordpress.org/plugins/load-more-products-for-woocommerce)
- [Post Types Order](https://wordpress.org/plugins/post-types-order)
- [String locator](https://wordpress.org/plugins/string-locator)
- [Category Order and Taxonomy Terms Order](https://wordpress.org/plugins/taxonomy-terms-order)
- [SVG Support](https://wordpress.org/plugins/svg-support)
- [Variation Swatches for WooCommerce](https://wordpress.org/plugins/woo-variation-swatches)
- [Advanced AJAX Product Filters](https://wordpress.org/plugins/woocommerce-ajax-filters)
- [BackWPup – WordPress Backup Plugin](https://wordpress.org/plugins/backwpup)
- [WP Chat App](https://wordpress.org/plugins/wp-whatsapp)
- [File Manager](https://wordpress.org/plugins/wp-file-manager)
- [FakerPress](https://wordpress.org/plugins/fakerpress)
- [WooCommerce Products Per Page](https://wordpress.org/plugins/woocommerce-products-per-page)
- [WooCommerce Gift Cards](https://woocommerce.com/products/gift-cards/)
- [Customize My Account Page For Woocommerce](https://hnamcoder.com/themes-va-plugins/customize-my-account-page-for-woocommerce/)

<p align="right">(<a href="#top">back to top</a>)</p>

### Example Component for Type Rocket

#### Builder

```sh
<h1>Jewelry Banner V2</h1>
<?php
$options_font = [
	'Default' => 'default-font',
	'Carolissa' => 'carolissa-font',
	'Cherlotte' => 'cherlotte-font'
];
$options_btn = [
	'Default' => 'btn-default',
	'Button layout 1' => 'btn-layout-1',
	'Button layout 2' => 'btn-layout-2'
];
echo $form->image('img')->setLabel('Banner');
echo $form->color('bg_color')->setLabel('Background Color');
echo $form->text('title')->setLabel('Title');
echo $form->editor('desc')->setLabel('Description');
echo $form->select('style_font')->setLabel('Choose Font')->setOptions($options_font)->setSetting('default', 'default-font');
echo $form->row(
    $form->text('btn_txt')->setLabel('Text Button'),
    $form->text('btn_link')->setLabel('Link Button')->setDefault('#'),
);
echo $form->select('style_btn')->setLabel('Choose Button Layout')->setOptions($options_btn)->setSetting('default', 'btn-default');
echo $form->toggle('txt_white')->setLabel('Active White Color Content');
echo $form->repeater('list')->setLabel('List')->setFields([
   $form->row(
      $form->column(
         $form->image('img')->setLabel('Image'),
      ),
      $form->column(
         $form->text('title')->setLabel('Title'),
         $form->editor('desc')->setLabel('Description'),
         $form->text('btn_txt')->setLabel('Text Button'),
         $form->text('btn_link')->setLabel('Link Button')->setDefault('#'),
      ),
   ),
]);
$txt = 'Padding';
echo $form->row(
	$form->text('top')->setLabel($txt . ' Top')->setType('number')->setHelp('rem'),
	$form->text('bottom')->setLabel($txt . ' Bottom')->setType('number')->setHelp('rem'),
	$form->text('left')->setLabel($txt . ' Left')->setType('number')->setHelp('rem'),
	$form->text('right')->setLabel($txt . ' Right')->setType('number')->setHelp('rem'),
);
```

#### Visual

```sh
<?php
if (current_user_can('administrator')) {
   $path = 'data="jewelry-banner-v2.php"';
   $name = ' data-name="Jewelry Banner V2"';
}
$bg_color = $data['bg_color'];
$title = $data['title'];
$style_font = $data['style_font'];
$style_btn = $data['style_btn'];
$padding = padding_tr($data['top'] ?? null, $data['right'] ?? null,  $data['bottom'] ?? null,  $data['left'] ?? null);
?>
<section class="banner-1 <?php echo ((!empty($data['txt_white'])) ? 'white-text' : ''); ?>" <?php echo (!empty($path)?$path.$name:''); ?> style="background-image: url('<?php echo get_attachment($data['img'])['src']; ?>'); background-size:cover; background-position: center center;<?php echo (!empty($bg_color) ? 'background-color:' . $bg_color . ';' : ''); ?><?php echo $padding; ?>">
   <div class="container">
      <div class="content">
         <?php if (!empty($data['img'])) : ?><img class="" src="<?php echo get_attachment($data['img'])['src']; ?>" alt="" /><?php endif; ?>
         <?php if (!empty($data['title'])) : ?><div class="title"><?php echo $data['title']; ?></div><?php endif; ?>
         <?php if (!empty($data['desc'])) : ?><div class="desc"><?php echo $data['desc']; ?></div><?php endif; ?>
         <?php if (!empty($data['btn_txt'])) : ?>
            <div class="btn-wrap">
               <a class="btn-main" href="<?php echo $data['btn_link']; ?>"><?php echo $data['btn_txt']; ?></a>
            </div>
         <?php endif; ?>
      </div>
      <?php if (!empty($data['list'])) { ?>
         <?php foreach ($data['list'] as $item) { ?>
            <div class='container'>
               <div class='content'>
                  <?php if (!empty($item['img'])) : ?>
                     <img class="" src="<?php echo get_attachment($item['img'])['src']; ?>" alt="" />
                  <?php endif; ?>
                  <?php if (!empty($item['title'])) : ?>
                     <h2 class='title'><?php echo $item['title']; ?></h2>
                  <?php endif; ?>
                  <?php if (!empty($item['desc'])) : ?>
                     <div class='desc'><?php echo $item['desc']; ?></div>
                  <?php endif; ?>
                  <?php if (!empty($item['btn_link'])) : ?>
                     <div class='btn-group'><a class='btn-main' href='<?php echo $item['btn_link']; ?>'><?php echo $item['btn_txt']; ?></a></div>
                  <?php endif; ?>
               </div>
            </div>
         <?php } ?>
      <?php } ?>
   </div>
</section>
```

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->

### Usage

Use this space to show useful examples of how a project can be used. Additional screenshots, code examples and demos work well in this space. You may also link to more resources.

_For more examples, please refer to the [Documentation](https://example.com)_

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- CONTACT -->

### Contact

<!-- Your Name - [@twitter_handle](https://twitter.com/twitter_handle) - email@email_client.com -->

Project Link: [https://github.com/namdh2603/corsivalab-exam](https://github.com/namdh2603/corsivalab-exam)

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/github_username/repo_name.svg?style=for-the-badge
[contributors-url]: https://github.com/github_username/repo_name/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/github_username/repo_name.svg?style=for-the-badge
[forks-url]: https://github.com/github_username/repo_name/network/members
[stars-shield]: https://img.shields.io/github/stars/github_username/repo_name.svg?style=for-the-badge
[stars-url]: https://github.com/github_username/repo_name/stargazers
[issues-shield]: https://img.shields.io/github/issues/github_username/repo_name.svg?style=for-the-badge
[issues-url]: https://github.com/github_username/repo_name/issues
[license-shield]: https://img.shields.io/github/license/github_username/repo_name.svg?style=for-the-badge
[license-url]: https://github.com/github_username/repo_name/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/linkedin_username
[product-screenshot]: images/screenshot.png
