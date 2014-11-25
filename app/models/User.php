<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
// Model
use App\Models\Groups as Groups;
// Model Base Helper
use App\Models\Helper\ModelBase as ModelBaseHelper;

class User extends Eloquent implements UserInterface, RemindableInterface {
    /* Traits
    -------------------------------*/
	use UserTrait, RemindableTrait;
    use ModelBaseHelper;
    
	/* Constants
    -------------------------------*/
    const DEFAULT_PASSWORD_CUSTOMER = 'mypassword';
    const DEFAULT_PASSWORD_BACKEND = 'whatisthepassword';
    const USERS_GROUPS_TABLE = 'users_groups';
    const USER_CONTACT_ADDRESSES_TABLE = 'user_contact_addresses';
    const ACTIVATED = 1;
    
    /* Public Properties
    -------------------------------*/
    /* Protected Properties
    -------------------------------*/
    
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    protected $fillable = [
        'email', 'password'
    ];

    /* Private Properties
    -------------------------------*/
    

    /* Public Methods
    -------------------------------*/

    /**
    * Relation to Model PromocodeUsedIn
    *
    * @return 'App\Models\PromocodeUsedIn'
    */
    public function promocodeUsedIn()
    {
        return $this->hasMany('App\Models\PromocodeUsedIn', 'user_id');
    }

    /**
    * Return all customer users
    *
    * @return array of objects
    */
    public static function getCustomers()
    {
        $group = NULL;

        try
        {
            // get groups
            $group = \Sentry::findGroupByName(Groups::CUSTOMER);
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            return [];
        }

        // get users
        return \Sentry::findAllUsersInGroup($group);
        
    }

    /**
    * Return all administrator users
    *
    * @return array of objects
    */
    public static function getAdministrators()
    {
        $group = NULL;
        
        try
        {   
            // get groups
            $group = \Sentry::findGroupByName(Groups::ADMINISTRATOR);
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            return [];
        }

        // get users
        $users = \Sentry::findAllUsersInGroup($group);
        // get user's groups
        $users->each(function($user)
         {
            $user['group'] = self::getCurrentGroups($user->id);
         });
        
        return $users;
    }

    /**
    * Return user info and group info
    *
    * @return array of objects
    */
    public static function getUser($userId)
    {
        # get user data
        $user = \Sentry::findUserById($userId);
        # get group data
        $user['group'] = self::getCurrentGroups($user->id);
        
        return $user;
    }

    /**
    * Get Current user's group
    *
    * @param int
    * @return array of objects
    */
    public static function getCurrentGroups($user)
    {
        $group = DB::table(self::USERS_GROUPS_TABLE)
            ->where('user_id', $user)
            ->get();
            
        return $group;
    }

    public function scopeUserId($query, $UserId)
    {
        return $query->where('id', '=', $UserId);
    }

    /**
    * Relation to Model UserAddress
    *
    * @return 'App\Models\UserAddress'
    */
    public function userAddress()
    {
        return $this->hasOne('App\Models\UserAddress', 'user_id');
    }

    /**
    * Relation to Model UserInfo
    *
    * @return 'App\Models\UserInfo'
    */
    public function userInfo()
    {
        return $this->hasOne('App\Models\UserInfo', 'user_id');
    }

    /**
    * Relation to Model Orders
    *
    * @return 'App\Models\Orders'
    */
    public function orders()
    {
        return $this->hasMany('App\Models\Orders', 'user_id');
    }

    /**
    * Relation to Model UserLibrary
    *
    * @return 'App\Models\UserLibrary'
    */
    public function library()
    {
        return $this->hasMany('App\Models\UserLibrary', 'user_id');
    }
    
    /**
    *
    *
    */

    /* Protected Methods
    -------------------------------*/

    /* Private Methods
    -------------------------------*/
}
