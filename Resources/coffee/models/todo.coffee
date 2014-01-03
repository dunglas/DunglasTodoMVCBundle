# This file is part of the DunglasTodoMVCBundle package.
#
# (c) Kévin Dunglas <dunglas@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

define [
  'chaplin',
  'models/base/model'
], (Chaplin, Model) ->
  'use strict'

  class Todo extends Model
    defaults:
      title: ''
      completed: no

    toggle: ->
      @set completed: not @get('completed')

    isVisible: ->
      isCompleted = @get('completed')