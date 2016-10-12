<?php if(!defined('KIRBY')) exit ?>

title: Site
fields:
  generalSettings:
    label: Site Settings
    type: headline
  title:
    label: Title
    type:  text
  description:
    label: Description
    type:  textarea
  keywords:
    label: Keywords
    type:  tags
  customcss:
    label: Custom CSS
    type: textarea
    buttons: false
  googleAnalytics:
    label: Google Analytics ID
    type: text
    icon: code
    help: Tracking ID in the form UA-XXXXXXXX-X. Keep this field empty if you are not using it.
    width: 1/2
  ogimage:
    label: Facebook OpenGraph image
    type: image
    help: 1200x630px minimum
    width: 1/2
  footer:
    label: Footer
    type: headline
  contact:
    label: Contact
    type: textarea
  address:
    label: Address
    type: textarea
  socials:
    label: Socials
    type: textarea
  parallax:
    label: Parallax Slides
    type: structure
    style: table
    fields:
      maintitle:
        label: Title
        type: text
        width: 1/2
      visual:
        label: Visual
        type: image
        width: 1/2
      subtitle:
        label: Subtitle
        type: text
        width: 1/2
      anim:
        label: Animation
        type: select
        default : left
        required: true
        options:
          left : Left
          right : Right
          top : Top
          bottom : Bottom
      text:
        label: Text
        type: textarea