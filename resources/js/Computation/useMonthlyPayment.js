import { computed, isRef } from "vue";

export const useMonthlyPayment = (total, intRate, duration) => {
    const monthlyPayment = computed(() => {
        const principle = isRef(total) ? total.value : total;
        const monthlyInterest =
            (isRef(intRate) ? intRate.value : intRate) / 100 / 12;
        const numberOfPaymentMonths =
            (isRef(duration) ? duration.value : duration) * 12;

        return (
            (principle *
                monthlyInterest *
                Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) /
            (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1)
        );
    });

    const totalPaid = computed(() => {
        return (
            (isRef(duration) ? duration.value : duration) *
            12 *
            monthlyPayment.value
        );
    });

    const totalInterest = computed(
        () => totalPaid.value - (isRef(total) ? total.value : total)
    );

    return { monthlyPayment, totalPaid, totalInterest };
};
