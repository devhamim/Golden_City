<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function leftChild()
    {
        return $this->belongsTo(User::class, 'left_child_id');
    }

    public function rightChild()
    {
        return $this->belongsTo(User::class, 'right_child_id');
    }

    public function getDownlineChildren($level = 1, $maxLevel = 5)
    {
        if ($level > $maxLevel) {
            return collect();
        }

        $downlineChildren = collect();

        if ($this->leftChild) {
            $downlineChildren->push($this->leftChild);
            $downlineChildren = $downlineChildren->merge(
                $this->leftChild->getDownlineChildren($level + 1, $maxLevel)
            );
        }

        if ($this->rightChild) {
            $downlineChildren->push($this->rightChild);
            $downlineChildren = $downlineChildren->merge(
                $this->rightChild->getDownlineChildren($level + 1, $maxLevel)
            );
        }

        return $downlineChildren;
    }


    public function totalDownlineCount($side = null) // Count Downline child
    {
        if ($side === 'left') {
            return $this->countDownline($this->left_child_id);
        } elseif ($side === 'right') {
            return $this->countDownline($this->right_child_id);
        } else {
            $leftCount = $this->countDownline($this->left_child_id);
            $rightCount = $this->countDownline($this->right_child_id);
            return [
                'left' => $leftCount,
                'right' => $rightCount,
            ];
        }
    }

    private function countDownline($childId) //Private Nest
    {
        if ($childId === null) {
            return 0;
        }
        $child = User::find($childId);
        if ($child === null) {
            return 0;
        }
        $leftCount = $child->countDownline($child->left_child_id);
        $rightCount = $child->countDownline($child->right_child_id);
        return $leftCount + $rightCount + 1;
    }

    public function lastUserInDownline($side = null) // Getting Last User Full Data
    {
        if ($side === 'left') {
            return $this->findLastUser($this->left_child_id);
        } elseif ($side === 'right') {
            return $this->findLastUser($this->right_child_id);
        } else {
            $leftLast = $this->findLastUser($this->left_child_id);
            $rightLast = $this->findLastUser($this->right_child_id);
            return [
                'left' => $leftLast,
                'right' => $rightLast,
            ];
        }
    }

    private function findLastUser($childId) //Private Nest
    {
        if ($childId === null) {
            return $this;
        }
        $child = User::find($childId);
        if ($child === null) {
            return $this;
        }

        return $child->findLastUser($child->right_child_id);
    }

    public function parent() //Find Parent
    {
        return $this->belongsTo(User::class, 'parent_id');
    }
}
