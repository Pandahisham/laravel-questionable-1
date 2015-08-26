<?php

    namespace Tshafer\Questionable\Traits;

    use Illuminate\Database\Eloquent\Model;
    use Tshafer\Questionable\Models\Question;

    /**
     * Class Questionable.
     */
    trait Questionable
    {

        /**
         * @return \Illuminate\Database\Eloquent\Relations\MorphMany
         */
        public function questions()
        {
            return $this->morphMany( Question::class, 'questionable' );
        }

        /**
         * @param       $data
         * @param Model $author
         *
         * @return static
         */
        public function createQuestion( $data, Model $author )
        {
            return ( new Question() )->createQuestion( $this, $data, $author );
        }

        /**
         * @param $id
         * @param $data
         *
         * @return mixed
         */
        public function updateQuestion( $id, $data )
        {
            return ( new Question() )->updateQuestion( $id, $data );
        }

        /**
         * @param $id
         *
         * @return mixed
         */
        public function deleteQuestion( $id )
        {
            return ( new Question() )->deleteQuestion( $id );
        }
    }
