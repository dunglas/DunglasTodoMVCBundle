define [
  'chaplin'
], (Chaplin) ->
  'use strict'

  class Layout extends Chaplin.Layout

    # Place your application-specific Layout features here
    initialize: ->
        super
        @subscribeEvent 'todos:filter', @changeFilterer

    changeFilterer: (filterer = 'all') ->
      $('#todoapp').attr 'class', "filter-#{filterer}"