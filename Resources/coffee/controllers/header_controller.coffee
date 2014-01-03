# This file is part of the DunglasTodoMVCBundle package.
#
# (c) Kévin Dunglas <dunglas@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

define [
  'chaplin'
  'views/header_view'
], (Chaplin, HeaderView) ->
  'use strict'
  
  class HeaderController extends Chaplin.Controller
    initialize: (params) ->
      super
      @view = new HeaderView collection: Chaplin.mediator.todos
