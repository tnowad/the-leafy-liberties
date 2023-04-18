<?php
namespace Core\Traits;

trait SoftDeletes
{
  protected $deletedAtColumn = 'deleted_at';

  public function delete(): void
  {
    $this->{$this->deletedAtColumn} = date('Y-m-d H:i:s');
    $this->save();
  }

  public function forceDelete(): void
  {
    parent::delete();
  }

  public function restore(): void
  {
    $this->{$this->deletedAtColumn} = null;
    $this->save();
  }

  public static function withTrashed(): self
  {
    return new static;
  }

  public static function onlyTrashed(): self
  {
    return new static;
  }

  protected function getQualifiedDeletedAtColumn(): string
  {
    return $this->table . '.' . $this->deletedAtColumn;
  }

  public function isSoftDeleted(): bool
  {
    return !is_null($this->{$this->deletedAtColumn});
  }

  public static function all()
  {
    $records = parent::all();

    $filteredRecords = [];
    foreach ($records as $record) {
      if (!$record->deleted_at) {
        $filteredRecords[] = $record;
      }
    }
    return $filteredRecords;
  }

}