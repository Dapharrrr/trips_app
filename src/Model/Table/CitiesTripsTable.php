<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CitiesTrips Model
 *
 * @property \App\Model\Table\TripsTable&\Cake\ORM\Association\BelongsTo $Trips
 * @property \App\Model\Table\CitiesTable&\Cake\ORM\Association\BelongsTo $Cities
 *
 * @method \App\Model\Entity\CitiesTrip newEmptyEntity()
 * @method \App\Model\Entity\CitiesTrip newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CitiesTrip> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CitiesTrip get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CitiesTrip findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CitiesTrip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CitiesTrip> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CitiesTrip|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CitiesTrip saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CitiesTrip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CitiesTrip>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CitiesTrip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CitiesTrip> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CitiesTrip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CitiesTrip>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CitiesTrip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CitiesTrip> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CitiesTripsTable extends Table
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

        $this->setTable('cities_trips');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Trips', [
            'foreignKey' => 'trip_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER',
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
            ->integer('trip_id')
            ->notEmptyString('trip_id');

        $validator
            ->integer('city_id')
            ->notEmptyString('city_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['trip_id'], 'Trips'), ['errorField' => 'trip_id']);
        $rules->add($rules->existsIn(['city_id'], 'Cities'), ['errorField' => 'city_id']);

        return $rules;
    }
}
