<?php if(!defined('KIRBY')) exit ?>

title: Page
pages: false
files: true
fields:
  title:
    label: Title
    type:  text
    width: 1/2
  customtitle:
    label: Custom header title
    type:  text
    width: 1/2
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
        label: Parallax
        fields:
          head:
            label: Parallax
            type: text
      numbers:
        label: Numbers
        snippet: sections/numbers
        fields:
          number1:
            label: Number 1
            type: number
            width: 1/2
            required: true
          title1:
            label: Title 1
            type: text
            width: 1/2
            required: true
          number2:
            label: Number 2
            type: number
            width: 1/2
          title2:
            label: Title 2
            type: text
            width: 1/2
          number3:
            label: Number 3
            type: number
            width: 1/2
          title3:
            label: Title 3
            type: text
            width: 1/2
          number4:
            label: Number 4
            type: number
            width: 1/2
          title4:
            label: Title 4
            type: text
            width: 1/2
          size:
            label: Numbers displayed
            type: number
            default : 4
            required: true
            min : 1
            max : 4