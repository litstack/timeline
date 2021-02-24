<template>
	<lit-col :width="width">
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
	props: ['items', 'width'],
};
</script>
