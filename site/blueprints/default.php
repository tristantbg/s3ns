<?php if(!defined('KIRBY')) exit ?>

title: Page
pages: false
files: true
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea
  builder:
    label: Sections
    type: builder
    fieldsets:
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
            label: Size
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
      spacer:
        label: Spacer
        snippet: sections/spacer
        fields:
          size:
            label: Size
            type: select
            default : small
            required: true
            options:
              small : Small
              large : Large
      parallax:
        label: Parallax Slide
        fields:
          head:
            label: Parallax
            type: text