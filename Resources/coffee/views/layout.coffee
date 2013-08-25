# This file is part of the DunglasTodoMVCBundle package.
#
# (c) Kévin Dunglas <dunglas@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

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