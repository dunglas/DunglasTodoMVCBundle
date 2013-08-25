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
  
  class IndexController extends Chaplin.Controller
    title: 'Todo list'
    
    test: (options) ->
      console.log 'you are here'

    list: (options) ->
      @publishEvent 'todos:filter', options.filterer?.trim() ? 'all'