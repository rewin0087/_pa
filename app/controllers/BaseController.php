<?php

class BaseController extends \Controller {

	protected $layout = NULL;
	protected $_template = NULL;
	protected $_header = NULL;
	protected $_footer = NULL;
    protected $_vars = [];
    protected $_inputs = [];
    protected $_files = [];
    protected $_class = NULL;
    protected $_title = NULL;
    protected $_uploadPath = '';
    protected $_me = [];

	public function __construct()
    {
        // set Inputs to property
        $this->_inputs = \Input::all();
        // set $_FILES to property
        $this->_files = $_FILES;
        // set upload path
        $this->_uploadPath = app_path().'/storage/uploads';
    	// render page after settings all business logics
        $this->afterFilter('@filterRenderPage'); 
    }

    /**
    * Render the Page now
    *
    */
    public function filterRenderPage() {
        $this->_renderPage();
    }

    /**
    * Redirect if user not logged in
    *
    */
    public function redirectUser($admin = false)
    {
        if( ! $this->_isUserLoggedIn() )
        {
            if( $admin )
            {
                return \Redirect::to('/login');
            }
            else
            {
                return \Redirect::to('/');
            }

        }
    }

    /**
    * Check User had loggedin
    *
    * @return boolean
    */
    protected function _isUserLoggedIn() {

        if( !\Sentry::check() )
        {
            return false;
        }

        $this->_me = \Sentry::getUser();

        return true;
    }

    /**
    * GEt Input File
    *
    */
    protected function _getFileInput($input_name) {
        return  \Input::file($input_name);
    }

    /**
	* Setting shared Values
	*
    * @param string
    * @param int | float | string | text | array | any
    *
    */
    protected function _sharedVars($index, $values)
    {
    	return \View::share($index, $values);
    }

    /**
	* Setting Template
	*
	* @param string
    * @param array 
    *
    */
    protected function _setTemplate($template, $values = [])
    {
    	if(!empty($values))
    	{
    		return \View::make($template, $values);
    	}

    	return \View::make($template);
    }

    /**
	*
	* Print Inline
    *
    * @param int | float | string | text | array | any
    */
    protected function _println($values, $exit = false) {
    	echo '<pre>';
    	print_r($values);
    	echo '</pre>';

        if($exit)
            exit;
    }

	/**
	 * Setup the layout used by the controller. Filter Function
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);	
		}
	}

	/**
	 * Render page
	 *
	 * @return void
	 */
	protected function _renderPage($body = true, $header = true, $footer = true)
	{
		// render template if action specified a template to render
		if( ! is_null($this->layout) && ! is_null($this->_template) )
		{
            // setting and getting to show header
            if($header)
            {
                $this->_setHeaderTemplate();
            }

            // setting and getting to show footer
            if( $footer )
            {
                $this->_setFooterTemplate();
            }

            // set page title
            $this->layout->content['title'] = $this->_title;

            // set page class
            $this->layout->content['class'] = $this->_class;

            // setting template
			$this->layout->content['body'] = $this->_template;

		}
	}

    /**
    * Set Html Class
    *
    *
    */
    protected function _setClass($class)
    {
        $this->_class = $class;

        return $this;
    }

    /**
    * Set Page Title
    *
    *
    */
    protected function _appendTitle($title)
    {
        $this->_title = $this->_title.$title;
        
        return $this;
    }

    /**
    * Set Header template and values for header
    *
    * @return self
    */
    protected function _setHeaderTemplate() 
    {
        if( ! is_null($this->_header) )
        {
            $this->layout->content['header'] = $this->_setTemplate($this->_header, $this->_vars);
        }

        return $this;
    }

    /**
    * Set Footer template and values for header
    *
    * @return self
    */
    protected function _setFooterTemplate() 
    {
        if( ! is_null($this->_footer) )
        {
            $this->layout->content['footer'] = $this->_setTemplate($this->_footer, $this->_vars);
        }

        return $this;
    }

    /**
    * Setting template vars to be pass on the header or footer template
    *
    * @param string
    * @param int | float | string | text | array | any
    */
    protected function _setValues($index, $values)
    {
        $this->_vars[$index] = $values;

        return $this;
    }

    /**
    * Return response json
    *
    * @param array
    * @param int
    * return json
    */
    protected function _setResponse($response, $code)
    {
        return \Response::json($response, $code);
    }

}
