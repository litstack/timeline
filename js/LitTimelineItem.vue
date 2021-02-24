<template>
	<div class="mb-2">
		<div
			class="lit-timeline-date-badge"
			:class="{
				'bg-gray-100': !danger && !success && !primary,
				'bg-red-300': danger,
				'bg-green-300': success,
			}"
		>
			<div
				:class="{
					'bg-black': !danger && !success && !primary,
					'bg-red-500': danger,
					'bg-green-500': success,
				}"
			></div>
			{{ item.date }}
		</div>

		<div
			v-if="item.show_time"
			class="lit-timeline-date-badge"
			:class="{
				'bg-gray-100': !danger && !success && !primary,
				'bg-red-300': danger,
				'bg-green-300': success,
			}"
			style="font-weight: normal;padding: 0 8px 0 8px;"
		>
			{{ item.time }}
		</div>
		<component
			:is="tagType"
			:href="item.link"
			class="link-class border-l"
			:class="{
				'border-black': !danger && !success && !primary,
				'border-red-500': danger,
				'border-green-500': success,
			}"
		>
			<div>
				<div class="mb-2 text-dark" v-if="item.title">
					<strong v-html="item.title" />
				</div>
				<div class="text-secondary text-xs" v-html="item.message" />
			</div>
		</component>
	</div>
</template>
<script>
export default {
	name: 'LitTimelineItem',
	props: {
		item: {
			type: Object,
			required: true,
		},
	},
	computed: {
		tagType() {
			return this.item.link ? 'a' : 'div';
		},
		date() {
			return this.item.date;
		},
		// Variants
		primary() {
			return this.item.variant == 'primary';
		},
		success() {
			return this.item.variant == 'success';
		},
		danger() {
			return this.item.variant == 'danger';
		},
	},
};
</script>
<style lang="scss" scoped>
.text-xs {
	font-size: 12px;
}
.border-l {
	border-width: 0 0 0 1px;
	border-style: solid;
}
.bg-red-300 {
	background: #ffd4de;
}
.bg-green-300 {
	background: #e8fff3;
}
.bg-gray-100 {
	background: #f4f6f8;
}
.bg-red-500 {
	background: #f67693;
}
.bg-green-500 {
	background: #41ffa5;
}
.bg-black {
	background: black;
}
.border-red-500 {
	border-color: #f67693;
}
.border-green-500 {
	border-color: #41ffa5;
}
.border-black {
	border-color: black;
}
.lit-timeline-date-badge {
	display: inline-flex;
	align-items: center;
	font-size: 11px;
	font-weight: 600;
	padding: 0 23px 0 8px;
	height: 23px;
	border-radius: 99999px;
	div {
		width: 7px;
		height: 7px;
		border-radius: 4px;
		margin-right: 10px;
	}
}
.link-class {
	position: relative;
	display: block;
	padding-top: 20px;
	margin-top: -12px;
	margin-left: 11px;
	margin-right: -2.5rem;
	text-decoration: none;
	& > div {
		padding: 12px 2.5rem 25px 25px;
		&:hover {
			background: #f4f6f8;
		}
	}
}
</style>
