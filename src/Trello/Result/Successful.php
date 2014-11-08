<?php
/**
 * Trello Successful Result
 *
 * A Successful Result will be returned from gateway methods when
 * validations pass. It will provide access to the created resource.
 *
 * For example, when creating a customer, Trello_Result_Successful will
 * respond to <b>customer</b> like so:
 *
 * <code>
 * $result = Trello_Customer::create(array('first_name' => "John"));
 * if ($result->success) {
 *     // Trello_Result_Successful
 *     echo "Created customer {$result->customer->id}";
 * } else {
 *     // Trello_Result_Error
 * }
 * </code>
 *
 *
 * @package    Trello
 * @subpackage Result
 * @copyright  2014 Steven Maguire
 */
class Trello_Result_Successful extends Trello_Instance
{
    /**
     *
     * @var boolean always true
     */
    public $success = true;
    /**
     *
     * @var string stores the internal name of the object providing access to
     */
    private $_returnObjectName;

    /**
     * @ignore
     * @param string $classToReturn name of class to instantiate
     */
    public function __construct($objToReturn = null, $propertyName = null)
    {
        $this->_attributes = [];

        if(!empty($objToReturn)) {

            if(empty($propertyName)) {
                $propertyName = Trello_Util::cleanClassName(
                    get_class($objToReturn)
                );
            }

            // save the name for indirect access
            $this->_returnObjectName = $propertyName;

            // create the property!
            $this->$propertyName = $objToReturn;
        }
    }

   /**
    *
    * @ignore
    * @return string string representation of the object's structure
    */
   public function __toString()
   {
       $returnObject = $this->_returnObjectName;
       return __CLASS__ . '['.$this->$returnObject->__toString().']';
   }

}
