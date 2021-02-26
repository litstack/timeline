<template>
	<lit-col :width="width">
		<h6 v-html="title" v-if="title" />
		<lit-timeline-item
			v-for="(item, index) in items"
			:key="index"
			:item="item"
		/>
	</lit-col>
</template>
<script>
export default {
	name: 'LitTimeline',
	props: ['items', 'width', 'title'],
};
</script>
