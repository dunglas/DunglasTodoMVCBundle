# This file is part of the DunglasTodoMVCBundle package.
#
# (c) Kévin Dunglas <dunglas@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

define [
  'views/base/view'
  #'text!templates/footer.hbs'
], (View) ->
  'use strict'

  class HeaderView extends View

    # Save the template string in a prototype property.
    # This is overwritten with the compiled template function.
    # In the end you might want to used precompiled templates.
    #template: template
    #template = null

    el: '#header'

    # Automatically render after initialize
    #autoRender: true
    
    initialize: ->
      super
      @delegate 'keypress', '#new-todo', @createOnEnter

    createOnEnter: (event) =>
      ENTER_KEY = 13
      title = $(event.currentTarget).val().trim()
      return if event.keyCode isnt ENTER_KEY or not title
      @collection.create {title}
      @$('#new-todo').val ''