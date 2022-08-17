<?php

namespace Convertim\Analytics;

use Convertim\Analytics\Exceptions\ConvertimAnalyticsBatParameterException;

class ConvertimAnalyticsFactory
{
    /**
     * @param array $options
     * @return \Convertim\Analytics\ConvertimAnalytics
     * @throws \Convertim\Analytics\Exceptions\ConvertimAnalyticsBatParameterException
     */
    public function createConvertimAnalytics($options)
    {
        if (array_key_exists(ConvertimAnalytics::OPTION_PROJECT_NAME, $options) === false) {
            throw new ConvertimAnalyticsBatParameterException(ConvertimAnalytics::OPTION_PROJECT_NAME);
        }

        if (array_key_exists(ConvertimAnalytics::OPTION_IS_PRODUCTION_MODE, $options) === false) {
            throw new ConvertimAnalyticsBatParameterException(ConvertimAnalytics::OPTION_IS_PRODUCTION_MODE);
        }

        return new ConvertimAnalytics($options);
    }
}
