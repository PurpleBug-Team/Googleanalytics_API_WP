<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\FirebaseDynamicLinks;

class CreateManagedShortLinkRequest extends \Google\Model
{
  protected $dynamicLinkInfoType = DynamicLinkInfo::class;
  protected $dynamicLinkInfoDataType = '';
  public $longDynamicLink;
  public $name;
  public $sdkVersion;
  protected $suffixType = Suffix::class;
  protected $suffixDataType = '';

  /**
   * @param DynamicLinkInfo
   */
  public function setDynamicLinkInfo(DynamicLinkInfo $dynamicLinkInfo)
  {
    $this->dynamicLinkInfo = $dynamicLinkInfo;
  }
  /**
   * @return DynamicLinkInfo
   */
  public function getDynamicLinkInfo()
  {
    return $this->dynamicLinkInfo;
  }
  public function setLongDynamicLink($longDynamicLink)
  {
    $this->longDynamicLink = $longDynamicLink;
  }
  public function getLongDynamicLink()
  {
    return $this->longDynamicLink;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSdkVersion($sdkVersion)
  {
    $this->sdkVersion = $sdkVersion;
  }
  public function getSdkVersion()
  {
    return $this->sdkVersion;
  }
  /**
   * @param Suffix
   */
  public function setSuffix(Suffix $suffix)
  {
    $this->suffix = $suffix;
  }
  /**
   * @return Suffix
   */
  public function getSuffix()
  {
    return $this->suffix;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateManagedShortLinkRequest::class, 'Google_Service_FirebaseDynamicLinks_CreateManagedShortLinkRequest');
