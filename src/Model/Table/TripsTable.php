<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trips Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 * @property \App\Model\Table\CitiesTable&\Cake\ORM\Association\BelongsToMany $Cities
 *
 * @method \App\Model\Entity\Trip newEmptyEntity()
 * @method \App\Model\Entity\Trip newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Trip> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trip get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Trip findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Trip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Trip> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trip|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Trip saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Trip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Trip>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Trip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Trip> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Trip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Trip>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Trip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Trip> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TripsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('trips');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Users', [
            'foreignKey' => 'trip_id',
        ]);
        $this->belongsToMany('Cities', [
            'foreignKey' => 'trip_id',
            'targetForeignKey' => 'city_id',
            'joinTable' => 'cities_trips',
        ]);
        
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
