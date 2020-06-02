<template>
    <v-app>
        <v-container>
            <v-row>
                <v-col>
                    <v-card class="mx-auto">
                        <v-card-text>
                            <p class="text--primary">
                                Hello Vuetify World!!
                            </p>
                        </v-card-text>
                        <v-divider></v-divider>
                        <v-card-actions>
                            <v-btn>インストール完了</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-app>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
