<?php

/* ---------------------------------------------
Overall Level UI (NON-CLINICAL)
--------------------------------------------- */
    $levelMap = [
    'Excellent' => [
        'bg' => 'bg-emerald-50',
        'text' => 'text-emerald-700',
        'icon' => 'fa-face-smile-beam',
        'title' => 'You’re doing great 🌟',
        'message' => 'Your responses reflect strong balance, awareness, and emotional wellbeing. Keep nurturing these habits.'
    ],
    'Good' => [
        'bg' => 'bg-lime-50',
        'text' => 'text-lime-700',
        'icon' => 'fa-face-smile',
        'title' => 'You’re on a healthy path 🌱',
        'message' => 'You’re doing well overall. With a little mindful attention, things can feel even better.'
    ],
    'Moderate' => [
        'bg' => 'bg-amber-50',
        'text' => 'text-amber-700',
        'icon' => 'fa-face-meh',
        'title' => 'Some areas need care 💛',
        'message' => 'You may be experiencing imbalance in certain areas. Small, steady changes can make a big difference.'
    ],
    'Needs Attention' => [
        'bg' => 'bg-orange-50',
        'text' => 'text-orange-700',
        'icon' => 'fa-face-frown',
        'title' => 'It’s okay to pause and reflect 🤍',
        'message' => 'Some areas may need extra care and support. You don’t have to figure it out alone.'
    ],
    ];

$topicColors = [

    'emotional_intelligence'=>[
        'bg'=>'from-purple-50 to-purple-100',
        'icon'=>'from-purple-400 to-purple-600',
        'text'=>'text-purple-800',
        'progress'=>'from-purple-400 to-purple-600'
    ],

    'personality'=>[
        'bg'=>'from-blue-50 to-blue-100',
        'icon'=>'from-blue-400 to-blue-600',
        'text'=>'text-blue-800',
        'progress'=>'from-blue-400 to-blue-600'
    ],

    'slumber_score'=>[
        'bg'=>'from-indigo-50 to-indigo-100',
        'icon'=>'from-indigo-400 to-indigo-600',
        'text'=>'text-indigo-800',
        'progress'=>'from-indigo-400 to-indigo-600'
    ],

    'emotional_eating'=>[
        'bg'=>'from-pink-50 to-pink-100',
        'icon'=>'from-pink-400 to-pink-600',
        'text'=>'text-pink-800',
        'progress'=>'from-pink-400 to-pink-600'
    ],

    'entrepreneur_employee'=>[
        'bg'=>'from-emerald-50 to-emerald-100',
        'icon'=>'from-emerald-400 to-emerald-600',
        'text'=>'text-emerald-800',
        'progress'=>'from-emerald-400 to-emerald-600'
    ],

    'swot'=>[
        'bg'=>'from-cyan-50 to-cyan-100',
        'icon'=>'from-cyan-400 to-cyan-600',
        'text'=>'text-cyan-800',
        'progress'=>'from-cyan-400 to-cyan-600'
    ],

    'interpersonal_skills'=>[
        'bg'=>'from-violet-50 to-violet-100',
        'icon'=>'from-violet-400 to-violet-600',
        'text'=>'text-violet-800',
        'progress'=>'from-violet-400 to-violet-600'
    ],

    'emotional_stability'=>[
        'bg'=>'from-amber-50 to-amber-100',
        'icon'=>'from-amber-400 to-amber-600',
        'text'=>'text-amber-800',
        'progress'=>'from-amber-400 to-amber-600'
    ],

    'relationship_health'=>[
        'bg'=>'from-rose-50 to-rose-100',
        'icon'=>'from-rose-400 to-rose-600',
        'text'=>'text-rose-800',
        'progress'=>'from-rose-400 to-rose-600'
    ]

];

    $topicIcons = [
    'emotional_intelligence'=>'fa-brain',
    'personality'=>'fa-user',
    'slumber_score'=>'fa-bed',
    'emotional_eating'=>'fa-utensils',
    'entrepreneur_employee'=>'fa-briefcase',
    'swot'=>'fa-chart-pie',
    'interpersonal_skills'=>'fa-comments',
    'emotional_stability'=>'fa-scale-balanced',
    'relationship_health'=>'fa-heart'
    ];

    /* ---------------------------------------------
    Personalised Tips Per Topic
    --------------------------------------------- */
    $topicTips = [

    'emotional_intelligence' => [
        'Excellent' => 'You’re highly aware of your emotions. Continue reflecting or journaling to maintain this strength.',
        'Good' => 'Pausing before reacting in stressful moments can deepen emotional control.',
        'Moderate' => 'Try naming your emotions during the day to build awareness.',
        'Needs Attention' => 'Mindfulness or guided reflection can help you understand emotions better.',
    ],

    'personality' => [
        'Excellent' => 'You show strong self-awareness. Keep embracing your natural strengths.',
        'Good' => 'Observing your behavior patterns can bring useful insights.',
        'Moderate' => 'Self-reflection exercises can help clarify your preferences.',
        'Needs Attention' => 'Exploring personality frameworks may offer helpful direction.',
    ],

    'slumber_score' => [
        'Excellent' => 'Your sleep habits are healthy. Keep your routine consistent.',
        'Good' => 'Reducing screen time before bed may improve rest.',
        'Moderate' => 'A fixed bedtime and calming routine can help.',
        'Needs Attention' => 'Focus on sleep hygiene: dark, quiet, and consistent sleep timing.',
    ],

    'emotional_eating' => [
        'Excellent' => 'You have good awareness around food and emotions.',
        'Good' => 'Pause briefly before eating to check emotional vs physical hunger.',
        'Moderate' => 'Identifying emotional triggers can reduce emotional eating.',
        'Needs Attention' => 'Replacing emotional eating with alternative coping habits may help.',
    ],

    'entrepreneur_employee' => [
        'Excellent' => 'You show strong decision confidence. Keep trusting your instincts.',
        'Good' => 'Balancing risk and stability can support growth.',
        'Moderate' => 'Clarifying long-term goals may guide your career choices.',
        'Needs Attention' => 'Reflecting on responsibility and uncertainty can bring clarity.',
    ],

    'swot' => [
        'Excellent' => 'You understand your strengths and opportunities well.',
        'Good' => 'Revisiting goals regularly strengthens self-awareness.',
        'Moderate' => 'Writing a simple personal SWOT can improve clarity.',
        'Needs Attention' => 'Identifying one strength and one opportunity is a good start.',
    ],

    'interpersonal_skills' => [
        'Excellent' => 'Your communication skills are strong. Keep nurturing relationships.',
        'Good' => 'Active listening can further improve interactions.',
        'Moderate' => 'Practicing empathy during conversations may help.',
        'Needs Attention' => 'Clear and calm communication can strengthen connections.',
    ],

    'emotional_stability' => [
        'Excellent' => 'You manage stress very well. Maintain your coping strategies.',
        'Good' => 'Short breaks and relaxation can help during busy days.',
        'Moderate' => 'Stress-management techniques may improve balance.',
        'Needs Attention' => 'Building daily calming routines can help regulate emotions.',
    ],

    'relationship_health' => [
        'Excellent' => 'You maintain healthy and supportive relationships.Continue nurturing trust, communication, and emotional connection.',
        'Good' => 'Your relationships are generally positive. Small efforts in communication and appreciation can make them even stronger.',
        'Moderate' => 'Being more open about your thoughts and feelings can improve your relationships.',
         'Needs Attention' => 'Focusing on honest communication and emotional understanding can help strengthen your relationships.',
    ],

    'ikigai' => [
        'Excellent' => 'You have a strong sense of purpose. Keep aligning actions with values.',
        'Good' => 'Reflecting on what energizes you can deepen fulfillment.',
        'Moderate' => 'Exploring meaningful activities may bring clarity.',
        'Needs Attention' => 'Small purpose-driven goals can help restore motivation.',
    ],
    ];




