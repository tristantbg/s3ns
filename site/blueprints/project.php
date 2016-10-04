<?php if(!defined('KIRBY')) exit ?>

title: Project
files: true
pages: false
fields:
  title:
    label: Title
    type:  text
    width: 3/4
  date:
    label: Year
    type:  date
    format: YYYY
    width: 1/4
  subtitle:
    label: Subtitle
    type:  text
    width: 3/4
  link:
    label: Vimeo or Youtube link
    type:  url
    required: true
    width: 1/4
  text:
    label: SEO Description
    type: textarea
  images:
    label: Images & video
    type: headline
  featuredimg:
    label: Image if featured
    type: image
    width: 1/4
  thumbimg:
    label: Thumb
    type: image
    required: true
    width: 1/4
  squarebrand:
    label: Brand image (square)
    type: image
    help: min 150x150 white alpha PNG
    required: true
    width: 1/4
  rectbrand:
    label: Brand image (rect)
    help: min 548x150 black PNG
    type: image
    required: true
    width: 1/4
  loopvideo:
    label: Video loop
    help: MP4 file
    type: select
    options: files
  details:
    label: More informations
    type: headline
  builder:
    label: Sections
    type: builder
    fieldsets:
      brandlogo:
        label: Brand Logo Centered
        snippet: sections/brandlogo
        fields:
          picture:
            label: Logo Image
            type: image
            required: true
      bodytext:
        label: Body Text
        snippet: sections/bodytext
        fields:
          full:
            label: Fullwidth
            type: toggle
            default: no
            text: yes/no
          text:
            label: Text
            type: textarea
      imagebanner:
        label: Image Banner
        snippet: sections/imagebanner
        fields:
          picture:
            label: Background Image
            type: image
            width : 1/2
          size:
            label: size
            type: select
            width : 1/2
            default : small
            required: true
            options:
              small : Small
              medium : Medium
              large : Large
          text:
            label: Text
            type: textarea
      quote:
        label: Quote
        snippet: sections/quote
        fields:
          text:
            label: Quote Text
            type: textarea
          citation:
            label: Citation
            type: text