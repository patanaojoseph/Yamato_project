<template>
    <section>
        <div class="px-24 text-gray-800 mt-9">
            <div
                class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6"
            >
                <div
                    class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0 mt-9"
                >
                    <img
                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="w-full h-80"
                        alt="Sample image"
                    />
                </div>
                <div
                    class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0"
                >
                    <form @submit.prevent="register" class="mt-9">
                        <div
                            class="flex flex-row items-center justify-center lg:justify-start"
                        >
                            <p class="text-lg mb-0 mr-4">
                                <b class="text-gray-500 font-nunito"
                                    >Register your account</b
                                >
                            </p>
                        </div>

                        <div
                            class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5 w-80"
                        ></div>

                        <!-- Name input -->
                        <div class="mb-6">
                            <input
                                v-model="form.name"
                                id="name"
                                type="text"
                                class="input w-80"
                                placeholder="Full name"
                            />
                            <div v-if="form.errors.name" class="error">
                                {{ form.errors.name }}
                            </div>
                        </div>

                        <!-- Email input -->
                        <div class="mb-6">
                            <input
                                v-model="form.email"
                                id="email"
                                type="text"
                                class="input w-80"
                                placeholder="email@example.com"
                            />
                            <div v-if="form.errors.email" class="error">
                                {{ form.errors.email }}
                            </div>
                        </div>

                        <!-- Password input -->
                        <div class="mb-6">
                            <input
                                v-model="form.password"
                                id="password"
                                type="password"
                                class="input w-80"
                                placeholder="Password"
                            />
                            <div v-if="form.errors.password" class="error">
                                {{ form.errors.password }}
                            </div>
                        </div>

                        <!-- Confirm Password input -->
                        <div class="mb-6">
                            <input
                                v-model="form.password_confirmation"
                                id="password_confirmation"
                                type="password"
                                class="input w-80"
                                placeholder="Confirm Password"
                            />
                            <div
                                v-if="form.errors.password_confirmation"
                                class="error"
                            >
                                {{ form.errors.password_confirmation }}
                            </div>
                        </div>

                        <div class="text-center lg:text-left">
                            <button
                                type="submit"
                                class="primary-button w-32 font-nunito font-bold"
                            >
                                Register
                            </button>
                            <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                                Already have an account?
                                <Link
                                    :href="route('login')"
                                    class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out"
                                    >login</Link
                                >
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const register = () => form.post(route("user-account.store"));
</script>
