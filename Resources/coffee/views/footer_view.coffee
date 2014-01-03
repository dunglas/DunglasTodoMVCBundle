# This file is part of the DunglasTodoMVCBundle package.
#
# (c) Kévin Dunglas <dunglas@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

define [
  'views/base/view'
], (View) ->
  'use strict'

  class FooterView extends View
    el: '#footer'
    autoRender: yes

    initialize: ->
      super
      @subscribeEvent 'todos:filter', @updateFilterer
      @listenTo @collection, 'all', @renderCounter
      @delegate 'click', '#clear-completed', @clearCompleted

    render: =>
      super
      @renderCounter()

    updateFilterer: (filterer) =>
      filterer = '.' if filterer is 'all'
      @$('#filters a')
        .removeClass('selected')
        .filter("[href='#{filterer}']")
        .addClass('selected')

    renderCounter: =>
      total = @collection.length
      active = @collection.getActive().length
      completed = @collection.getCompleted().length

      @$('#todo-count > strong').html active
      countDescription = (if active is 1 then 'item' else 'items')
      @$('.todo-count-title').text countDescription

      @$('#completed-count').html "(#{completed})"
      @$('#clear-completed').toggle(completed > 0)
      @$el.toggle(total > 0)

    clearCompleted: ->
      @publishEvent 'todos:clear'