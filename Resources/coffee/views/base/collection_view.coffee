# This file is part of the DunglasTodoMVCBundle package.
#
# (c) Kévin Dunglas <dunglas@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

define [
  'chaplin',
  'views/base/view'
], (Chaplin, View) ->
  'use strict'

  class CollectionView extends Chaplin.CollectionView

    # This class doesn’t inherit from the application-specific View class,
    # so we need to borrow the method from the View prototype:
    getTemplateFunction: View::getTemplateFunction
