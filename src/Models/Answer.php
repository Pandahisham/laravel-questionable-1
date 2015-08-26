<?php

    namespace Tshafer\Questionable\Models;

    use Illuminate\Database\Eloquent\Model;

    /**
     * Class Answer.
     */
    class Answer extends Model
    {

        /**
         * @var array
         */
        protected $guarded = [ 'id', 'created_at', 'updated_at' ];

        /**
         * @return \Illuminate\Database\Eloquent\Relations\MorphTo
         */
        public function author()
        {
            return $this->morphTo( 'author' );
        }

        /**
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function question()
        {
            return $this->belongsTo( Question::class );
        }

        /**
         * @return bool|int
         */
        public function markAsSolution()
        {
            $this->question()->markAsSolved( $this->id );

            return $this->update( [ 'is_solution' => true ] );
        }

        /**
         * @param Model $question
         * @param       $data
         * @param Model $author
         *
         * @return static
         */
        public function createAnswer( Model $question, $data, Model $author )
        {
            $answer = new static();
            $answer->fill( array_merge( $data, [
                'author_id'   => $author->id,
                'author_type' => get_class( $author ),
            ] ) );

            $question->anwers()->save( $answer );

            return $answer;
        }

        /**
         * @param $id
         * @param $data
         *
         * @return mixed
         */
        public function updateAnswer( $id, $data )
        {
            $answer = static::find( $id );
            $answer->update( $data );

            return $answer;
        }

        /**
         * @param $id
         *
         * @return mixed
         */
        public function deleteAnswer( $id )
        {
            return static::find( $id )->delete();
        }
    }
