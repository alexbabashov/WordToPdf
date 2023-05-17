<template>
    <form @submit.prevent enctype="multipart/form-data">
        <div class="form">
            <div class="input-file-wraper">
                <label for="file" class="label">Выберите документ word</label>
                <input
                    type="file"
                    ref="inputFile"
                />
            </div>
            <div class="input-value-wraper">
                <label for="file" class="label">Задайте значение</label>
                <input
                    type="text"
                    v-model.lazy="variableWord"
                />
            </div>
        </div>
    </form>
    <div class="btn-wraper">
        <button class="btn" @click="convertDocPdf">конвертировать</button>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default {
    data() {
        return {
            variableWord: "",
        }
    },
    components:{

    },
    methods: {
        convertDocPdf()
        {
            let file = this.$refs.inputFile.files[0];
            let variableWord = this.variableWord;
            this.$store.dispatch('convertDocPdf',
                                    {
                                        file,
                                        variableWord
                                    }
                                );
        },
    },
    computed: {

    }
}
</script>
