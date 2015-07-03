<nav>
<?php 
echo TbHtml::link(TbHtml::tag('h3', [], "{$survey->localizedTitle} ({$survey->sid})"), ['surveys/update', 'id' => $survey->sid]);
$items = [];
/** @var QuestionGroup $group */
foreach ($survey->groups as $group) {
    $items[] = [
        'label' => "{$group->title} - {$group->description}",
        'url' => ['groups/view', 'id' => $group->id],
        'class' => 'group',
        'active' => isset($this->group) && $this->group->id === $group->id && !isset($this->question)
    ];
    foreach ($group->questions as $question) {
        $items[] = [
        'label' => $question->displayLabel,
        'url' => ['questions/update', 'id' => $question->qid],
        'class' => 'question',
        'active' => isset($this->question) && $this->question->qid === $question->qid
    ];
    }
    $items[] = TbHtml::menuDivider();
}
$this->widget('TbNav', [
    'type' => TbHtml::NAV_TYPE_PILLS,
    'stacked' => true,
    'items' => $items
]);
?>
</nav>